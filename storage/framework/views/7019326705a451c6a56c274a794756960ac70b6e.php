<?php $__env->startSection('title', 'Clientes'); ?>

<?php $__env->startSection('content'); ?>
<?php if(session()->get('success')): ?>
<div class="alert alert-success">
 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><br />
<?php endif; ?>
<table class="table table-striped">
  <thead>
    <tr>
      <td>Id</td>
      <td>Nome</td>
      <td>CPF</td>
      <td>Endereço</td>
      <td colspan="2">Action</td>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($cliente->id); ?></td>
      <td><?php echo e($cliente->nome); ?></td>
      <td><?php echo e($cliente->cpf); ?></td>
      <td><?php echo e($cliente->endereco); ?></td>
      <td><a href="<?php echo e(route('cliente.locacao.index', $cliente->id)); ?>" class="btn btn-primary" role="button">Show Order</a></td>
      <td><a href="<?php echo e(route('cliente.edit', $cliente->id)); ?>" class="btn btn-primary" role="button">Edit</a></td>
      <td>
        <form action="<?php echo e(route('cliente.destroy', $cliente->id)); ?>" method="post">
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<a href="<?php echo e(route('cliente.create')); ?>" class="btn btn-primary" role="button">Add Client</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/cliente/index.blade.php ENDPATH**/ ?>