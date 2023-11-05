 <tr>
     <!--begin::Item-->
     <td>
         <a href="{{ route('admin.customer.show', ['customer' => $trans->user->id]) }}"
             class="text-dark text-hover-primary">{{ $trans->user->f_name }} {{ $trans->user->l_name }}</a>
     </td>
     <!--end::Item-->

     <!--begin::Product ID-->
     <td class="text-end text-capitalize">
         {{ $trans->type }}
     </td>
     <!--end::Product ID-->

     <!--begin::Date added-->
     <td class="text-end">

         {{ date('d M, Y', strtotime($trans->created_at)) }}
     </td>
     <!--end::Date added-->

     <!--begin::Price-->
     <td class="text-end">
         ${{ $trans->price_amount }}
     </td>
     <!--end::Price-->

     <!--begin::Status-->
     <td class="text-end">
         <span class="text-capitalize badge py-3 px-4 fs-7 badge-light-{{$trans->status == 1 ? 'success' : 'warning'}}">
           {{$trans->status == 1 ? 'success' : 'warning'}}
         </span>
     </td>
     <!--end::Status-->
 </tr>
