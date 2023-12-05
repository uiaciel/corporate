@extends('layouts.app')

@section('content')
<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Admin Login</h1>
							<p class="lead">
								{{ $setting->sitename }}
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" required>
											{{-- <small>
												<a href="/pages-reset-password">Forgot password?</a>
											</small> --}}
										</div>
										<div>
											<div class="form-check align-items-center">
												<input id="customControlInline" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
												<label class="form-check-label text-small" for="customControlInline">Remember me</label>
											</div>
										</div>
										<div class="d-grid gap-2 mt-3">
                                            <button type="submit" class="btn btn-primary">Sign In</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mt-3">
							<a href="/">Contact Support</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

@endsection
