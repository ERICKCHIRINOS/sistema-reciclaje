<section>
    <header class="mb-3">
        <h2 class="h5 fw-medium text-dark">
            {{ __('Profile Information') }}
        </h2>

        <p class="small text-muted mb-0">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name"
                   name="name"
                   type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $user->name) }}"
                   required
                   autofocus
                   autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email"
                   name="email"
                   type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $user->email) }}"
                   required
                   autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="small text-dark mb-1">
                        {{ __('Your email address is unverified.') }}

                        <button type="submit"
                                form="send-verification"
                                class="btn btn-link btn-sm p-0 align-baseline text-decoration-underline">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success small py-2 mb-0 mt-2" role="alert">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-success">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <span id="profile-updated-status" class="small text-success fw-medium">
                    {{ __('Saved.') }}
                </span>
                <script>
                    setTimeout(() => {
                        const el = document.getElementById('profile-updated-status');
                        if (el) el.style.display = 'none';
                    }, 2000);
                </script>
            @endif
        </div>
    </form>
</section>