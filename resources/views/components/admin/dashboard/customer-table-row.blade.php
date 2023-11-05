 <tr>
     <!--begin::Item-->
     <td>
         <a href="{{ route('admin.customer.show', ['customer' => $customer->id]) }}"
             class="text-dark text-hover-primary">{{ $customer->f_name }} {{ $customer->l_name }}</a>
     </td>
     <!--end::Item-->

     <!--begin::Product ID-->
     <td class="text-end text-capitalize">
         {{ $customer->email }}
     </td>
     <!--end::Product ID-->

     <!--begin::Date added-->
     <td class="text-end">

         {{ date('d M, Y', strtotime($customer->created_at)) }}
     </td>
     <!--end::Date added-->

     <!--begin::Status-->
     <td class="text-end">
         <span class="text-capitalize badge py-3 px-4 fs-7 badge-light-{{$customer->status == 1 ? 'success' : 'warning'}}">
           {{$customer->status == 1 ? 'Verified' : 'Pending'}}
         </span>
     </td>
     <!--end::Status-->
 </tr>
