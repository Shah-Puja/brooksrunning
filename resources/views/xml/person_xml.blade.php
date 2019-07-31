@if(isset($data['process']) && $data['process']!='')
     @switch($data['process'])
          @case('order')
               @php $email = (isset($this->order->address->email)) ? $this->order->address->email : ''; @endphp
          @break
          @default
               @php $email = (isset($data['email'])) ? $data['email'] : ''; @endphp
     @endswitch
@endif
<Person>
     <Firstname>{{(isset($data['first_name'])) ? $data['first_name'] : ''}}</Firstname>
     <Surname>(isset($data['last_name'])) ? $data['last_name'] : ''</Surname>
     <Sex>{{(isset($data['gender'])) ? $data['gender'] : ''}}</Sex> 
     <DateOfBirth></DateOfBirth>
     <Contacts>
          <Email>{{$email}}</Email>
          <Phones>
               <Home>{{(isset($this->order->address->s_phone)) ? $this->order->address->s_phone : ''}}</Home>
          </Phones>
     </Contacts>
     <Addresses>
          <Billing>
               <AddressLine1>{{(isset($this->order->address->b_add1)) ? htmlspecialchars($this->order->address->b_add1) : ''}}</AddressLine1>
               <AddressLine2>{{(isset($this->order->address->b_add2)) ? htmlspecialchars($this->order->address->b_add2) : ''}}</AddressLine2>
               <City>{{(isset($this->order->address->b_city)) ? htmlspecialchars($this->order->address->b_city) : ''}}</City>
               <State>{{(isset($this->order->address->b_state)) ? htmlspecialchars($this->order->address->b_state) : ''}}</State>
               <Postcode>{{(isset($this->order->address->b_postcode)) ? $this->order->address->b_postcode : ''}}</Postcode>
               <Country>{{(isset($data['country'])) ? $data['country'] : ''}}</Country>
          </Billing>
          <Delivery>
          <AddressLine1>{{(isset($this->order->address->s_add1)) ? htmlspecialchars($this->order->address->s_add1) : ''}}</AddressLine1>
               <AddressLine2>{{(isset($this->order->address->s_add2)) ? htmlspecialchars($this->order->address->s_add2) : ''}}</AddressLine2>
               <City>{{(isset($this->order->address->s_city)) ? htmlspecialchars($this->order->address->s_city) : ''}}</City>
               <State>{{(isset($this->order->address->s_state)) ? htmlspecialchars($this->order->address->s_state) : ''}}</State>
               <Postcode>{{(isset($this->order->address->s_postcode)) ? $this->order->address->s_postcode : ''}}</Postcode>
               <Country></Country>
          </Delivery>
     </Addresses>
</Person>