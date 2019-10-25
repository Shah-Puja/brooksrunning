<Person>
    <Firstname>{{ (isset($data['fname']) && $data['fname']!='') ? $data['fname'] : ''}}</Firstname>
    <Surname>{{ (isset($data['lname']) && $data['lname']!='') ? $data['lname'] : ''}}</Surname>   
    <Sex>{{ (isset($data['gender']) && $data['gender']!='') ? $data['gender'] : ''}}</Sex> 
    <DateOfBirth></DateOfBirth>
    <Contacts>
        <Email>{{ (isset($data['email']) && $data['email']!='') ? $data['email'] : ''}}</Email>
        <Phones></Phones>
    </Contacts>
    <Addresses>
        <Billing>
            <State>{{ (isset($data['state']) && $data['state']!='') ? $data['state'] : ''}}</State>
            <Country>AU</Country>
        </Billing>
    </Addresses>
    @if(isset($data['loyalty']) && $data['loyalty']== 'PPP')
    <Loyalties>
        <Loyalty>
            <LoyaltyTypeId>{{env('LOYALTY_ID')}}</LoyaltyTypeId>
        </Loyalty>
    </Loyalties>
    @endif
</Person>