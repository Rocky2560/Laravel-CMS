<?php $__env->startSection('content'); ?>
<style>
    .uper {
      margin-top: 40px;
    }
  </style>

<div class="uper">
    <?php if(session()->get('success')): ?>
      <div class="alert alert-success">
        <?php echo e(session()->get('success')); ?>  
      </div><br />
    <?php endif; ?>
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Address</td>
            <td>Email</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          <?php $__currentLoopData = $crud; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <td><?php echo e($data->id); ?></td>
              <td><?php echo e($data->name); ?></td>
              <td><?php echo e($data->address); ?></td>
              <td><?php echo e($data->email); ?></td>
              <td><a href="<?php echo e(route('crud.edit',$data->id)); ?>" class="btn btn-primary">Edit</a></td>
              <td>
                  <form action="<?php echo e(route('crud.destroy', $data->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  <div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>