<x-mail::message>
    Hello {{ $userData['name'] }},<br />
    <br />
    Your registration data:<br />
    <br />
    <strong>Email:</strong> {{ $userData['email'] }}<br />
    <strong>Password:</strong> {{ $userData['password'] }}<br />
    <br />
    <br />
    {{ config('app.name') }}
</x-mail::message>
