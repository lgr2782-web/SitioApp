<form method="POST" action="{{ route('login.post') }}">
    @csrf

    <input type="email" name="email" placeholder="Email" required>
    <br>

    <input type="password" name="password" placeholder="Password" required>
    <br>

    <button type="submit">Ingresar</button>

    @error('login')
        <p style="color:red">{{ $message }}</p>
    @enderror
</form>
