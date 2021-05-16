@component('mail::message')
# Please Activate your Account
@component('mail::panel')
    To Acivate Your Account
@endcomponent
@component('mail::button',['url'=>$url])
        Confirm
@endcomponent
    Thanks ,
    <br>
    by {{config('app.name')}}
@endcomponent