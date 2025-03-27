<!-- filepath: resources/views/emails/verify-email.blade.php -->
@component('mail::message')
# Selamat Datang di {{ config('app.name') }}!

Halo {{ $user->name }},

Terima kasih telah mendaftar dengan kami. Kami sangat senang Anda bergabung! Untuk memulai, silakan verifikasi alamat email Anda dengan mengklik tombol di bawah ini.

@component('mail::button', ['url' => $url, 'color' => 'success'])
Verifikasi Alamat Email
@endcomponent

Jika Anda tidak membuat akun, tidak perlu melakukan tindakan lebih lanjut.

Jika Anda memiliki pertanyaan, jangan ragu untuk membalas email ini atau menghubungi tim dukungan kami.

Salam hangat,<br>
Tim {{ config('app.name') }}

@slot('subcopy')
Jika Anda mengalami kesulitan mengklik tombol "Verifikasi Alamat Email", salin dan tempel URL di bawah ini ke browser web Anda: [{{ $url }}]({{ $url }})

@endslot
@endcomponent
