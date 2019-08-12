<table border="0">
  <tbody>
    <tr>
      <td>
        <table border="0">
          <tbody>
            <tr>
              <td style="text-align:center">
                  <img class="img img-fluid" src="{{url('/uploads/2017/07/header2a-768x122.jpg')}}" alt="Lejeune Notaries" itemprop="image" height="159" width="1000" srcset="{{asset('uploads/2017/07/header2a.jpg')}} 1000w, {{asset('uploads/2017/07/header2a-300x48.jpg')}} 300w, {{asset('uploads/2017/07/header2a-768x122.jpg')}} 768w" sizes="(max-width: 1000px) 100vw, 1000px" />
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table border="0" width="505">
          <tbody>
            <tr>
              <td width="505">
                <table cellpadding="10">
                  <tbody>
                    <tr>
                      <td>
                        <b>Order ID: </b> {{ $order->id }}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Order time: </b> {{ date('m/d/Y g:i a',strtotime($order->created_at)) }}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Request Type: </b> {{ $order->type }}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>I am/ We are: </b> {{ $order->is_business }}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Name: </b> {{ $order->name }}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Company: </b> {{ $order->company }}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Phone: </b> {{ $order->phone }}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Service Address: </b> {{ $order->service_address }}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Service Date: </b> {{ date('m/d/Y',strtotime($order->service_date) ) }}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Service Time: </b> {{ time('H:i: A', strtotime($order->service_time) ) }}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Number of people: </b> {{$order->people}}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Number of packages: </b> {{$order->packages}}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Service: </b> {{$order->service}}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>Comment: </b> {{$order->comment}}
                      </td>
                    </tr>
                  </tbody>
                </table>
                <br><br>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>