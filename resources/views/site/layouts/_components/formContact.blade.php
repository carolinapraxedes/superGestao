{{$slot}}
<form action="{{route('site.contact')}}" method="POST">
    @csrf
    <input name="name" value="{{old('name')}}" type="text" placeholder="Name" class="{{$classe}}">
    @if($errors->has('name'))
        {{-- caso existir um erro associado ao name --}}
        {{$errors->first('name')}}
    @endif
    <br>
    <input name="phoneNumber" value="{{old('phoneNumber')}}" type="text" placeholder="Phone Number" class="{{$classe}}">
    {{$errors->has('phoneNumber') ? $errors->first('phoneNumber') : ''}}
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
    {{$errors->has('email') ? $errors->first('email') : ''}}
    <br>
    
    <select name="reasonContactId"  class="{{$classe}}">
        <option value="">What's the reason for your contact?</option>
        @foreach ($reasonContact as $key => $reason)
            <option value="{{$reason->id}}" {{old('reasonContactId') == $reason->id ? 'selected': ''}}>{{$reason->reasonContact}}</option>
        @endforeach

    </select>
    {{$errors->has('reasonContactId') ? $errors->first('reasonContactId') : ''}}

    <br>
    
    <textarea name="message"  class="{{$classe}}">{{(old('message')!= '') ? old('message') : 'Fill your message here' }}</textarea>
    {{$errors->has('message') ? $errors->first('message') : ''}}
    <br>
    <button type="submit" class="{{$classe}}">SUBMIT</button>
</form>