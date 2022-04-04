<form method="post" action="/forget">
    @csrf
    <input name="email" type="text">
    <button>submit</button>
</form>
@error('email')
{{ $message }}
@enderror