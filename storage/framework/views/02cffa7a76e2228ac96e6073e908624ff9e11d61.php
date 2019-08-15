<?php $__env->startSection('title', 'Locacoes'); ?>

<?php $__env->startSection('content'); ?>
<?php if(session()->get('success')): ?>
<div class="alert alert-success">
  <?php echo e(session()->get('success')); ?>

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><br />
<?php endif; ?>
<table>
<td><a href="<?php echo e(route('cliente.index')); ?>" class="btn btn-primary" role="button">Back</a></td>
</table>
<table class="table table-striped">
  <thead>
    <tr>
      <td>Id</td>
      <td>Data da Locacao</td>
      <td>Data da Entrega</td>
      <td>Valor</td>
      <td colspan="2">Action</td>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $locacao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($locacao->id); ?></td>
      <td><?php echo e($locacao->dataLocacao); ?></td>
      <td><?php echo e($locacao->dataEntrega); ?></td>
      <td><?php echo e($locacao->valor); ?></td>
      <td><a href="<?php echo e(route('cliente.locacao.edit', [$locacao->cliente_id, $locacao->id])); ?>" class="btn btn-primary" role="button">Edit</a></td>
      <td>
        <form action="<?php echo e(route('cliente.locacao.destroy', [$locacao->cliente_id, $locacao->id])); ?>" method="post">
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<a href="<?php echo e(route('cliente.locacao.create', $locacao->cliente_id)); ?>" class="btn btn-primary" role="button">Add Rent</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/locacao/index.blade.php ENDPATH**/ ?>