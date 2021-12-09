

<?php $__env->startSection('main-content'); ?>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            <?php echo $__env->make('backend.layouts.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Coupon List</h6>
      <a href="<?php echo e(route('coupon.create')); ?>" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Coupon</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if(count($coupons)>0): ?>
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Coupon Code</th>
              <th>Type</th>
              <th>Value</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>S.N.</th>
                <th>Coupon Code</th>
                <th>Type</th>
                <th>Value</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
          </tfoot>
          <tbody>
            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                <tr>
                    <td><?php echo e($coupon->id); ?></td>
                    <td><?php echo e($coupon->code); ?></td>
                    <td>
                        <?php if($coupon->type=='fixed'): ?>
                            <span class="badge badge-primary"><?php echo e($coupon->type); ?></span>
                        <?php else: ?>
                            <span class="badge badge-warning"><?php echo e($coupon->type); ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($coupon->type=='fixed'): ?>
                            $<?php echo e(number_format($coupon->value,2)); ?>

                        <?php else: ?>
                            <?php echo e($coupon->value); ?>%
                        <?php endif; ?></td>
                    <td>
                        <?php if($coupon->status=='active'): ?>
                            <span class="badge badge-success"><?php echo e($coupon->status); ?></span>
                        <?php else: ?>
                            <span class="badge badge-warning"><?php echo e($coupon->status); ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('coupon.edit',$coupon->id)); ?>" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="<?php echo e(route('coupon.destroy',[$coupon->id])); ?>">
                          <?php echo csrf_field(); ?> 
                          <?php echo method_field('delete'); ?>
                              <button class="btn btn-danger btn-sm dltBtn" data-id=<?php echo e($coupon->id); ?> style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                    
                    
                </tr>  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
        <span style="float:right"><?php echo e($coupons->links()); ?></span>
        <?php else: ?>
          <h6 class="text-center">No Coupon found!!! Please create coupon</h6>
        <?php endif; ?>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
  <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(3.2);
      }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

  <!-- Page level plugins -->
  <script src="<?php echo e(asset('backend/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo e(asset('backend/js/demo/datatables-demo.js')); ?>"></script>
  <script>
      
      $('#banner-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[4,5]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){
            
        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\omega-id\omega-id\resources\views/backend/coupon/index.blade.php ENDPATH**/ ?>