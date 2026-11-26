<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold mb-0">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="col-lg-8 px-0">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="col-lg-8 px-0">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="col-lg-8 px-0">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>