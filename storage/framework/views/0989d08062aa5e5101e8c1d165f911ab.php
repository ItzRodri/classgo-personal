<main class="tb-main am-dispute-system am-invoice-system">
    <div class ="row">
        <div class="col-lg-12 col-md-12">
            <div class="tb-dhb-mainheading">
                <h4> <?php echo e(__('general.invoices') .' ('. $orders->total() .')'); ?></h4>
                <div class="tb-sortby">
                    <form class="tb-themeform tb-displistform">
                        <fieldset>
                            <div class="tb-themeform__wrap">
                                <div class="tb-actionselect" wire:ignore>
                                    <div class="tb-select">
                                        <select data-componentid="window.Livewire.find('<?php echo e($_instance->getId()); ?>')" class="am-select2 form-control" data-searchable="false" data-live='true' id="status" data-wiremodel="status" >
                                            <option value="" <?php echo e($status == '' ? 'selected' : ''); ?> ><?php echo e(__('invoices.all_invoices')); ?></option>
                                            <option value="pending" <?php echo e($status == 'pending' ? 'selected' : ''); ?> ><?php echo e(__('booking.pending')); ?></option>
                                            <option value="complete" <?php echo e($status == 'complete' ? 'selected' : ''); ?> ><?php echo e(__('booking.complete')); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="tb-actionselect" wire:ignore>
                                    <div class="tb-select">
                                        <select data-componentid="window.Livewire.find('<?php echo e($_instance->getId()); ?>')" class="am-select2 form-control" data-searchable="false" data-live='true' id="sort_by" data-wiremodel="sortby" >
                                            <option value="asc" <?php echo e($sortby == 'asc' ? 'selected' : ''); ?> ><?php echo e(__('general.asc')); ?></option>
                                            <option value="desc" <?php echo e($sortby == 'desc' ? 'selected' : ''); ?> ><?php echo e(__('general.desc')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group tb-inputicon tb-inputheight">
                                    <i class="icon-search"></i>
                                    <input type="text" class="form-control" wire:model.live.debounce.500ms="search"  autocomplete="off" placeholder="<?php echo e(__('general.search')); ?>">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="am-disputelist_wrap">
                <div class="am-disputelist am-custom-scrollbar-y">
                    <!--[if BLOCK]><![endif]--><?php if( !$orders->isEmpty() ): ?>
                        <table class="tb-table <?php if(setting('_general.table_responsive') == 'yes'): ?> tb-table-responsive <?php endif; ?>">
                            <thead>
                                <th><?php echo e(__('booking.id')); ?></th>
                                <th><?php echo e(__('booking.transaction_id')); ?></th>
                                <th><?php echo e(__('booking.items')); ?></th>
                                <th><?php echo e(__('booking.student_name')); ?></th>
                                <th><?php echo e(__('booking.payment_method')); ?></th>
                                <th><?php echo e(__('booking.amount')); ?></th>
                                <th><?php echo e(__('booking.admin_commission')); ?></th>
                                <th><?php echo e(__('booking.status')); ?></th>
                                <th><?php echo e(__('general.actions')); ?></th>
                            </thead>
                            <tbody>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                       $options = $order?->options ?? [];
                                       $subject = $options['subject'] ?? '';
                                       $image   = $options['image'] ?? '';
                                    ?>
                                    <tr>
                                        <td data-label="<?php echo e(__('booking.id')); ?>"><span><?php echo e($order?->id); ?></span></td>
                                        <td data-label="<?php echo e(__('booking.transaction_id')); ?>"><span><?php echo e(!empty($order?->transaction_id) ? $order->transaction_id : '-'); ?></span></td>
                                        <td data-label="<?php echo e(__('booking.items' )); ?>">
                                            <div class="tb-varification_userinfo">
                                                <strong class="tb-adminhead__img">
                                                    <!--[if BLOCK]><![endif]--><?php if(!empty($order?->slot_bookings_count)): ?>
                                                        <?php echo e($order?->slot_bookings_count == 1 ? __('booking.session_count', ['count' => $order?->slot_bookings_count]) : __('booking.sessions_count', ['count' => $order?->slot_bookings_count])); ?>

                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    <!--[if BLOCK]><![endif]--><?php if(\Nwidart\Modules\Facades\Module::has('courses') && \Nwidart\Modules\Facades\Module::isEnabled('courses') && !empty($order?->courses_count) ): ?>
                                                        <!--[if BLOCK]><![endif]--><?php if(!empty($order?->slot_bookings_count)): ?> | <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        <?php echo e($order?->courses_count == 1 ? __('booking.course_count', ['count' => $order?->courses_count]) : __('booking.courses_count', ['count' => $order?->courses_count])); ?>

                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    <!--[if BLOCK]><![endif]--><?php if(\Nwidart\Modules\Facades\Module::has('subscriptions') && \Nwidart\Modules\Facades\Module::isEnabled('subscriptions') && !empty($order?->subscriptions_count)): ?>
                                                        <?php if(!empty($order?->slot_bookings_count) || !empty($order?->courses_count)): ?> | <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                        <?php echo e($order?->subscriptions_count == 1 ? __('booking.subscription_count', ['count' => $order?->subscriptions_count]) : __('booking.subscriptions_count', ['count' => $order?->subscriptions_count])); ?>

                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                </strong>
                                            </div>
                                        </td>
                                        <td data-label="<?php echo e(__('booking.student_name' )); ?>">
                                            <div class="tb-varification_userinfo">
                                                <strong class="tb-adminhead__img">
                                                    <!--[if BLOCK]><![endif]--><?php if(!empty($order?->userProfile?->image) && Storage::disk(getStorageDisk())->exists($order?->userProfile?->image)): ?>
                                                    <img src="<?php echo e(resizedImage($order?->userProfile?->image,34,34)); ?>" alt="<?php echo e($order?->userProfile?->image); ?>" />
                                                    <?php else: ?>
                                                        <img src="<?php echo e(setting('_general.default_avatar_for_user') ? url(Storage::url(setting('_general.default_avatar_for_user')[0]['path'])) : resizedImage('placeholder.png', 34, 34)); ?>" alt="<?php echo e($order?->orderable?->student?->image); ?>" />
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                </strong>
                                                <span><?php echo e($order?->userProfile?->full_name); ?></span>
                                            </div>
                                        </td>
                                        <td data-label="<?php echo e(__('booking.payment_method' )); ?>">
                                            <span><?php echo e(__("settings." .$order?->payment_method. "_title")); ?></span>
                                        </td>
                                        <td data-label="<?php echo e(__('booking.amount')); ?>">
                                            <span><?php echo formatAmount($order?->amount); ?></span>
                                        </td>
                                        <td data-label="<?php echo e(__('booking.admin_commission')); ?>">
                                            <span><?php echo empty($order?->subscription_id) ? formatAmount($order?->admin_commission) : formatAmount(0); ?></span>
                                        </td>
                                        <td data-label="<?php echo e(__('booking.status' )); ?>">
                                            <div class="am-status-tag">
                                                <em class="tk-project-tag <?php echo e($order?->status == 'complete' ? 'tk-hourly-tag' : 'tk-fixed-tag'); ?>"><?php echo e($order?->status); ?></em>
                                            </div>
                                        </td>
                                        <td data-label="<?php echo e(__('general.actions')); ?>">
                                            <button class="am-btn" wire:click.prevent="viewInvoice(<?php echo e($order?->id); ?>)">Preview</button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </tbody>
                        </table>
                            <?php echo e($orders->links('pagination.custom')); ?>

                    <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginal86cd4a276c2978c462f28bbb510e89a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86cd4a276c2978c462f28bbb510e89a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.no-record','data' => ['image' => asset('images/empty.png'),'title' => __('general.no_record_title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(asset('images/empty.png')),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('general.no_record_title'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal86cd4a276c2978c462f28bbb510e89a0)): ?>
<?php $attributes = $__attributesOriginal86cd4a276c2978c462f28bbb510e89a0; ?>
<?php unset($__attributesOriginal86cd4a276c2978c462f28bbb510e89a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal86cd4a276c2978c462f28bbb510e89a0)): ?>
<?php $component = $__componentOriginal86cd4a276c2978c462f28bbb510e89a0; ?>
<?php unset($__componentOriginal86cd4a276c2978c462f28bbb510e89a0); ?>
<?php endif; ?>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </div>
    <!-- Add Invoice Preview Modal -->
    
    <div class="modal fade tb-invoice-preview-modal" data-bs-backdrop="static" id="invoicePreviewModal" tabindex="-1" aria-labelledby="fileUploadModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('invoices.invoice')); ?></h5>
                    <span class="am-closepopup" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <g opacity="0.7">
                            <path d="M4 12L12 4M4 4L12 12" stroke="#585858" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
                    </span>
                    
                </div>
                <!--[if BLOCK]><![endif]--><?php if(!empty($invoice)): ?>
                    <div class="modal-body">
                        <div class="tb-invoice-container">
                            <!-- Invoice Header -->
                            <div class="tb-invoice-head">
                                <h2><?php echo e(__('invoices.invoice_bill_to')); ?>:</h2>
                                <div class="tb-customer-details">
                                    <div class="tb-detail-row">
                                        <span class="tb-label"><?php echo e(__('invoices.invoice_student_name')); ?>:</span>
                                        <span class="tb-value"><?php echo e($invoice?->first_name); ?> <?php echo e($invoice?->last_name); ?></span>
                                    </div>
                                    <div class="tb-detail-row">
                                        <span class="tb-label"><?php echo e(__('invoices.invoice_address')); ?>:</span>
                                        <span class="tb-value">
                                            <?php echo e($invoice?->city); ?>, <?php echo e($invoice?->countryDetails?->name ?? ''); ?>, <?php echo e($invoice?->state); ?>

                                        </span>
                                    </div>
                                    <div class="tb-detail-row">
                                        <span class="tb-label"><?php echo e(__('invoices.invoice_email')); ?>:</span>
                                        <span class="tb-value"><?php echo e($invoice?->email); ?></span>
                                    </div>
                                </div>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php if(!empty($invoice?->items)): ?>
                            <!-- Invoice Items -->
                                <div class="tb-invoice-items">
                                    <div class="tb-items-header">
                                        <div class="tb-col tb-col-id"><?php echo e(__('invoices.invoice_id')); ?></div>
                                        <div class="tb-col tb-col-title"><?php echo e(__('invoices.invoice_title')); ?></div>
                                        <div class="tb-col tb-col-qty"><?php echo e(__('invoices.invoice_qty')); ?></div>
                                        <div class="tb-col tb-col-discount"><?php echo e(__('invoices.invoice_discount_code')); ?></div>
                                        <div class="tb-col tb-col-discount"><?php echo e(__('invoices.invoice_discount_amount')); ?></div>
                                        <div class="tb-col tb-col-price"><?php echo e(__('invoices.invoice_price')); ?></div>
                                    </div>
                                
                                    <div class="tb-items-body">
                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $invoice?->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="tb-item-row">
                                                <div class="tb-col tb-col-id" data-label="ID"><?php echo e($item->id); ?></div>
                                                <div class="tb-col tb-col-title" data-label="Title"><?php echo e($item->title); ?></div>
                                                <div class="tb-col tb-col-qty" data-label="Qty."><?php echo e($item->quantity); ?></div>
                                                <div class="tb-col tb-col-discount" data-label="Qty.">
                                                    <!--[if BLOCK]><![endif]--><?php if(!empty($item?->options['discount_code'])): ?>
                                                        <?php echo e($item?->options['discount_code']); ?>

                                                    <?php else: ?>
                                                     --
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                </div>

                                                <div class="tb-col tb-col-discount" data-label="Discount">
                                                    <?php echo e($item?->discount_amount ?? 0); ?>

                                                </div>
                                                <div class="tb-col tb-col-price" data-label="Price"><?php echo e(( $item?->price - $item?->discount_amount ?? 0)); ?></div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <!-- Invoice Summary -->
                            <div class="tb-invoice-summary">
                                <?php
                                    $subTotal   = 0;
                                    $grossTotal = 0;
                                    foreach($invoice->items as $item) {
                                        $subTotal += ( $item?->price - $item?->discount_amount ?? 0) * $item->quantity;
                                    }
                                    $grossTotal = $subTotal;
                                ?>
                                <div class="tb-summary-row">
                                    <span class="tb-label" data-label="Subtotal"><?php echo e(__('invoices.invoice_subtotal')); ?>:</span>
                                    <span class="tb-value">$<?php echo e(number_format($subTotal, 2)); ?></span>
                                </div>

                                <div class="tb-summary-row tb-total">
                                    <span class="tb-label" data-label="Total"><?php echo e(__('invoices.invoice_total')); ?>:</span>
                                    <span class="tb-value">$<?php echo e(number_format($grossTotal, 2)); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
</main>


<?php $__env->startPush('scripts'); ?>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('openInvoiceModal', function(event) {
                setTimeout(() => {
                    $('#invoicePreviewModal').modal('show');
                }, 500);
            });
       });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/lexhwdfc/public_html/resources/views/livewire/pages/admin/invoices/invoices.blade.php ENDPATH**/ ?>