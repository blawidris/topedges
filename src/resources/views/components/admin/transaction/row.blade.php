 <tr class="odd">
     <td>
         <div class="form-check form-check-sm form-check-custom form-check-solid">
             <input class="form-check-input" type="checkbox" value="1">
         </div>
     </td>
     <td>
         <a href="#" class="text-gray-800 text-hover-primary mb-1">
             #{{ $trans->payment_id }}</a>
     </td><td>
         <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $trans->user->f_name }}
             {{ $trans->user->l_name }}</a>
     </td>
     <td>
         <a href="#" class="text-gray-600 text-hover-primary mb-1 text-capitalize"
             data-filter="{{ $trans->type }}">{{ $trans->type }}</a>
     </td>
     <td>
         ${{ $trans->price_amount }}
     </td>
     <td data-order="{{ $trans->status == 1 ? 'success' : 'warning' }}">
         <span class="badge badge-{{ $trans->status == 1 ? 'success' : 'warning' }} text-capitalize">{{ $trans->status == 1 ? 'success' : 'warning' }}</span>
     </td>
     <td data-order="2020-12-14T20:43:00-05:00 {{ date('Y-m-dTH:i:s', strtotime($trans->created_at)) }}">
         {{ date('j M, Y', strtotime($trans->created_at)) }}
     </td>
     <td class="text-end">
         <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
             data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
             Actions
             <i class="ki-duotone ki-down fs-5 ms-1"></i>
         </a>
         <!--begin::Menu-->
         <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
             data-kt-menu="true">
             <!--begin::Menu item-->
             <div class="menu-item px-3">
                 <a href="#" class="menu-link px-3" data-kt-customer-table-filter="approve_row" data-transaction="{{$trans->id}}" data-customer="{{$trans->user_id}}">
                     Approve
                 </a>
             </div>
             <!--end::Menu item-->

             <!--begin::Menu item-->
             <div class="menu-item px-3">
                 <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row_trans" data-transaction="{{$trans->id}}" data-customer="{{$trans->user_id}}">
                     Delete
                 </a>
             </div>
             <!--end::Menu item-->
         </div>
         <!--end::Menu-->
     </td>
 </tr>
