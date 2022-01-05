<script>
/**
 * Login component
 */
export default {
  data() {
    return {
      email: "",
      password: "",
      tryingToLogIn: false,
      isAuthError: false,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };
  },
  props: {
    submitUrl: {
      type: String,
      required: true,
    },
    authError: {
      type: String,
      required: false,
      default: () => null,
    },
    oldEmail: {
      type: String,
      required: false,
      default: () => null
    },
    oldPassword: {
      type: String,
      required: false,
      default: () => null
    }
  },
  mounted() {
    this.isAuthError = !!this.authError;
    
    if (this.oldEmail) this.email = this.oldEmail;
    if (this.oldPassword) this.password = this.oldPassword;
  },
};
</script>

<template>
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
      <div class="card overflow-hidden">
        <div class="bg-soft-primary">
          <div class="row">
            <div class="col-7">
              <div class="text-primary p-4">
                <h5 class="text-primary">Welcome Back !</h5>
                <p>Sign in to proceed.</p>
              </div>
            </div>
            <div class="col-5 align-self-end">
              <img src="/images/profile-img.png" alt class="img-fluid" />
            </div>
          </div>
        </div>
        <div class="card-body pt-0">
          <div>
            <a href="/">
              <div class="avatar-md profile-user-wid mb-4">
                <span class="avatar-title rounded-circle bg-light">
                  <img src="/images/logo.svg" alt height="34" />
                </span>
              </div>
            </a>
          </div>

          <b-alert v-model="isAuthError" variant="danger" class="mt-3" dismissible>{{authError}}</b-alert>

          <b-form class="p-2" :action="submitUrl" method="POST">
            <slot />
            <b-form-group id="input-group-1" label="Email" label-for="input-1">
              <b-form-input
                id="input-1"
                name="email"
                v-model="email"
                type="text"
                placeholder="Enter email"
              ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Password" label-for="input-2">
              <b-form-input
                id="input-2"
                v-model="password"
                name="password"
                type="password"
                placeholder="Enter password"
              ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-3">
                <b-form-checkbox
                    id="input-3"
                    name="remember"
                >Remember me</b-form-checkbox>
            </b-form-group>

            <div class="mt-3">
              <b-button type="submit" variant="primary" class="btn-block">Log In</b-button>
            </div>
            <div class="mt-4 text-center">
              <h5 class="font-size-14 mb-3">Sign in with</h5>

              <ul class="list-inline">
                <li class="list-inline-item">
                  <a
                    href="javascript: void(0);"
                    class="social-list-item bg-primary text-white border-primary"
                  >
                    <i class="mdi mdi-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a
                    href="javascript: void(0);"
                    class="social-list-item bg-info text-white border-info"
                  >
                    <i class="mdi mdi-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a
                    href="javascript: void(0);"
                    class="social-list-item bg-danger text-white border-danger"
                  >
                    <i class="mdi mdi-google"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="mt-4 text-center">
              <a href="/reset/password" class="text-muted">
                <i class="mdi mdi-lock mr-1"></i> Forgot your password?
              </a>
            </div>

            <input type="hidden" name="_token" :value="csrf">
          </b-form>
        </div>
        <!-- end card-body -->
      </div>
      <!-- end card -->

      <div class="mt-5 text-center">
        <p>
          Don't have an account ?
          <a
            href="/register"
            class="font-weight-medium text-primary"
          >Signup now</a>
        </p>
        <p>
          © {{new Date().getFullYear()}} Skote. Crafted with
          <i class="mdi mdi-heart text-danger"></i> by Themesbrand
        </p>
      </div>
      <!-- end row -->
    </div>
    <!-- end col -->
  </div>
  <!-- end row -->
</template>

