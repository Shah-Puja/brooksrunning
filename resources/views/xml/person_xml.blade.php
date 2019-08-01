@if(isset($data['process']) && $data['process']!='')
     @switch($data['process'])
          @case('order')
               @php $email = (isset($order->address->email)) ? $order->address->email : ''; @endphp
          @break
          @default
               @php $email = (isset($data['email'])) ? $data['email'] : ''; @endphp
     @endswitch
@endif
<Person>
     <Firstname>{{(isset($data['first_name'])) ? $data['first_name'] : ''}}</Firstname>
     <Surname>{{(isset($data['last_name'])) ? $data['last_name'] : ''}}</Surname>
     <Sex>{{(isset($data['gender'])) ? $data['gender'] : ''}}</Sex> 
     <DateOfBirth></DateOfBirth>
     <Contacts>
          <Email>{{$email}}</Email>
          <Phones>
               <Home>{{(isset($order->address->s_phone)) ? $order->address->s_phone : ''}}</Home>
          </Phones>
     </Contacts>
     <Addresses>
          <Billing>
               <AddressLine1>{{(isset($order->address->b_add1)) ? htmlspecialchars($order->address->b_add1) : ''}}</AddressLine1>
               <AddressLine2>{{(isset($order->address->b_add2)) ? htmlspecialchars($order->address->b_add2) : ''}}</AddressLine2>
               <City>{{(isset($order->address->b_city)) ? htmlspecialchars($order->address->b_city) : ''}}</City>
               <State>{{(isset($order->address->b_state)) ? htmlspecialchars($order->address->b_state) : ''}}</State>
               <Postcode>{{(isset($order->address->b_postcode)) ? $order->address->b_postcode : ''}}</Postcode>
               <Country>{{(isset($data['country'])) ? $data['country'] : ''}}</Country>
          </Billing>
          <Delivery>
          <AddressLine1>{{(isset($order->address->s_add1)) ? htmlspecialchars($order->address->s_add1) : ''}}</AddressLine1>
               <AddressLine2>{{(isset($order->address->s_add2)) ? htmlspecialchars($order->address->s_add2) : ''}}</AddressLine2>
               <City>{{(isset($order->address->s_city)) ? htmlspecialchars($order->address->s_city) : ''}}</City>
               <State>{{(isset($order->address->s_state)) ? htmlspecialchars($order->address->s_state) : ''}}</State>
               <Postcode>{{(isset($order->address->s_postcode)) ? $order->address->s_postcode : ''}}</Postcode>
               <Country></Country>
          </Delivery>
     </Addresses>
</Person>