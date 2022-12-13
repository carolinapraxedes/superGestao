{{$slot}}
<form action="{{route('site.contact')}}" method="POST">
    @csrf
    <input name="name" type="text" placeholder="Name" class="{{$classe}}">
    <br>
    <input name="phoneNumber" type="text" placeholder="Phone Number" class="{{$classe}}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{$classe}}">
    <br>
    <select name="reasonContact" class="{{$classe}}">
        <option value="">What's the reason for your contact?</option>
        <option value="1">Questions</option>
        <option value="2">Commendation</option>
        <option value="3">Complain</option>
    </select>
    <br>
    
    <textarea name="message" class="{{$classe}}" placeholder="Fill your message here"></textarea>
    <br>
    <button type="submit" class="{{$classe}}">SUBMIT</button>
</form>