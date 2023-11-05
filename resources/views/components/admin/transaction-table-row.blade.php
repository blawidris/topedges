  <tr>
      <td>
          <a href="#" class="text-gray-600 text-hover-primary mb-1">{{ $trans->order_id }}</a>
      </td>
      <td>
          <span
              class="badge badge-light-{{ $trans->status == 1 ? 'success' : 'warning' }}">{{ $trans->status == 1 ? 'successfull' : 'Pending' }}</span>
      </td>
      <td>
          ${{ $trans->price_amount }}
      </td>
      <td>
          {{ date('j M Y, H:i a', strtotime($trans->created_at)) }}
      </td>
      <td class="text-capitalize">
          {{ $trans->type }}
      </td>
      <td class="pe-0 text-end">
          <a href="#" class="btn btn-sm btn-light image.png btn-active-light-primary" data-kt-menu-trigger="click"
              data-kt-menu-placement="bottom-end">
              Actions
              <i class="ki-duotone ki-down fs-5 ms-1"></i>
          </a>
          <!--begin::Menu-->
          <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
              data-kt-menu="true">
              <!--begin::Menu item-->
              @if ($trans->type === 'deposit')
                  <div class="menu-item px-3">
                      <a href="#" class="menu-link px-3" data-kt-customer-table-filter="approve_row" data-transaction="{{$trans->id}}" data-customer="{{$trans->user_id}}">
                          Approve
                      </a>
                  </div>
                  <!--end::Menu item-->
              @endif
              <!--begin::Menu item-->
              <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row" data-transaction="{{$trans->id}}" data-customer="{{$trans->user_id}}">
                      Delete
                  </a>
              </div>
              <!--end::Menu item-->
          </div>
          <!--end::Menu-->
      </td>
  </tr>
