<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Betikrom Trade · Admin Login</title>
  <!-- Font Awesome (free) for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: #0b0e14;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
    }

    /* glass-morphism card */
    .login-card {
      background: rgba(20, 27, 38, 0.85);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.06);
      border-radius: 2.5rem;
      padding: 2.8rem 2.5rem;
      max-width: 440px;
      width: 100%;
      box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.8), 0 0 0 1px rgba(255, 255, 255, 0.02);
      transition: transform 0.2s ease;
    }

    .login-card:hover {
      transform: translateY(-2px);
    }

    /* logo area */
    .logo-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 2.5rem;
    }

    .logo-wrapper {
      background: rgba(255, 255, 255, 0.03);
      padding: 0.75rem 1.8rem 0.75rem 1.2rem;
      border-radius: 60px;
      display: inline-flex;
      align-items: center;
      gap: 0.6rem;
      border: 1px solid rgba(255, 255, 255, 0.04);
      backdrop-filter: blur(4px);
    }

    .logo-img {
      height: 46px;
      width: auto;
      display: block;
      filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
    }

    .logo-text {
      color: #f0f3fa;
      font-weight: 600;
      font-size: 1.3rem;
      letter-spacing: 0.02em;
      background: linear-gradient(135deg, #d6e0ff, #a0b8ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .badge-admin {
      background: rgba(99, 102, 241, 0.15);
      border: 1px solid rgba(99, 102, 241, 0.2);
      color: #b3c4ff;
      font-size: 0.7rem;
      font-weight: 500;
      padding: 0.2rem 0.8rem;
      border-radius: 30px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin-top: 0.3rem;
      backdrop-filter: blur(4px);
    }

    /* session status */
    .session-status {
      background: rgba(16, 185, 129, 0.08);
      border: 1px solid rgba(16, 185, 129, 0.15);
      color: #7dd3fc;
      padding: 0.7rem 1rem;
      border-radius: 1.2rem;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 2rem;
    }

    .session-status i {
      color: #34d399;
      font-size: 0.9rem;
    }

    /* form elements */
    .input-group {
      margin-bottom: 1.6rem;
    }

    .input-label {
      display: block;
      font-size: 0.8rem;
      font-weight: 500;
      color: #b9c8f0;
      letter-spacing: 0.02em;
      margin-bottom: 0.4rem;
    }

    .input-field {
      width: 100%;
      background: rgba(12, 18, 28, 0.7);
      border: 1px solid rgba(255, 255, 255, 0.06);
      border-radius: 1.4rem;
      padding: 0.8rem 1.2rem 0.8rem 2.8rem;
      font-size: 0.95rem;
      color: #edf2ff;
      transition: all 0.2s ease;
      backdrop-filter: blur(4px);
      box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .input-field:focus {
      outline: none;
      border-color: #6b7eff;
      background: rgba(18, 26, 40, 0.8);
      box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15), inset 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .input-field::placeholder {
      color: #5b6b93;
      font-weight: 300;
      font-size: 0.9rem;
    }

    .input-icon-wrapper {
      position: relative;
    }

    .input-icon-wrapper i {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #6c7fa3;
      font-size: 1rem;
      transition: color 0.2s;
    }

    .input-icon-wrapper:focus-within i {
      color: #8fa2ff;
    }

    .input-error {
      color: #f28b82;
      font-size: 0.75rem;
      margin-top: 0.35rem;
      padding-left: 0.5rem;
      display: flex;
      align-items: center;
      gap: 0.3rem;
    }

    /* remember & forgot */
    .flex-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 1.8rem 0 2rem;
    }

    .remember-me {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: #b0c2e8;
      font-size: 0.9rem;
      cursor: pointer;
    }

    .remember-me input[type="checkbox"] {
      width: 18px;
      height: 18px;
      accent-color: #6b7eff;
      background: #111a2a;
      border: 1px solid #2d3a58;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.15s;
      filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
    }

    .remember-me input[type="checkbox"]:checked {
      background-color: #6b7eff;
      border-color: #6b7eff;
    }

    .forgot-link {
      color: #99abdf;
      font-size: 0.85rem;
      text-decoration: none;
      border-bottom: 1px dotted rgba(255, 255, 255, 0.05);
      transition: color 0.15s, border-color 0.15s;
    }

    .forgot-link:hover {
      color: #c6d4ff;
      border-color: #6b7eff;
    }

    /* button */
    .login-btn {
      width: 100%;
      background: linear-gradient(145deg, #5f6eff, #4a53d1);
      border: none;
      padding: 0.9rem 1.2rem;
      border-radius: 3rem;
      font-weight: 600;
      font-size: 1rem;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.6rem;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 8px 18px -6px rgba(79, 94, 255, 0.3);
      letter-spacing: 0.02em;
      border: 1px solid rgba(255, 255, 255, 0.06);
    }

    .login-btn i {
      font-size: 1rem;
      transition: transform 0.2s;
    }

    .login-btn:hover {
      background: linear-gradient(145deg, #6f7eff, #505be0);
      transform: scale(1.01);
      box-shadow: 0 12px 24px -8px rgba(79, 94, 255, 0.4);
    }

    .login-btn:hover i {
      transform: translateX(4px);
    }

    .login-btn:active {
      transform: scale(0.98);
    }

    /* extra small */
    .text-muted {
      color: #6c7fa3;
      font-size: 0.7rem;
      text-align: center;
      margin-top: 2rem;
      border-top: 1px solid rgba(255, 255, 255, 0.03);
      padding-top: 1.8rem;
      letter-spacing: 0.02em;
    }

    .text-muted span {
      color: #8ba0d0;
    }

    /* responsive */
    @media (max-width: 480px) {
      .login-card {
        padding: 2rem 1.5rem;
        border-radius: 2rem;
      }
      .logo-wrapper {
        padding: 0.6rem 1.4rem 0.6rem 0.9rem;
      }
      .logo-img {
        height: 38px;
      }
      .logo-text {
        font-size: 1.1rem;
      }
      .flex-row {
        flex-wrap: wrap;
        gap: 1rem;
      }
    }

    /* custom scroll */
    ::-webkit-scrollbar {
      width: 4px;
      background: #121a2a;
    }
    ::-webkit-scrollbar-thumb {
      background: #3a4b70;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <!-- Logo & branding -->
    <div class="logo-section">
      <div class="logo-wrapper">
        <!-- Your provided logo (Betikrom Trade) from prnt.sc -->
        <img 
          class="logo-img" 
          src="{{ asset('storage/betikrom-logo.png') }}" 
          alt="Betikrom Trade logo" 
        />        
        <span class="logo-text">Betikrom</span>
      </div>
      <div class="badge-admin">Admin panel</div>
    </div>

    <!-- Session Status (like Laravel's x-auth-session-status) -->
    <div class="session-status">
      <i class="fas fa-circle-check"></i>
      <span>Session active · secure</span>
    </div>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email -->
      <div class="input-group">
        <label class="input-label" for="email">
          <i class="far fa-envelope" style="margin-right: 6px; opacity: 0.7;"></i> Email Address
        </label>
        <div class="input-icon-wrapper">
          <i class="fas fa-user"></i>
          <input 
            id="email" 
            class="input-field" 
            type="email" 
            name="email" 
            value="{{ old('email') }}" 
            required 
            autofocus 
            autocomplete="username" 
            placeholder="admin@betikrom.com"
          />
        </div>
        <!-- error message (like x-input-error) -->
        @error('email')
          <div class="input-error">
            <i class="fas fa-circle-exclamation" style="font-size: 0.7rem;"></i> 
            {{ $message }}
          </div>
        @enderror
      </div>

      <!-- Password -->
      <div class="input-group">
        <label class="input-label" for="password">
          <i class="fas fa-lock" style="margin-right: 6px; opacity: 0.7;"></i> Password
        </label>
        <div class="input-icon-wrapper">
          <i class="fas fa-key"></i>
          <input 
            id="password" 
            class="input-field" 
            type="password" 
            name="password" 
            required 
            autocomplete="current-password" 
            placeholder="••••••••"
          />
        </div>
        @error('password')
          <div class="input-error">
            <i class="fas fa-circle-exclamation" style="font-size: 0.7rem;"></i> 
            {{ $message }}
          </div>
        @enderror
      </div>

      <!-- Remember & Forgot -->
      <div class="flex-row">
        <label class="remember-me" for="remember_me">
          <input id="remember_me" type="checkbox" name="remember" />
          <span>Remember me</span>
        </label>

        @if (Route::has('password.request'))
          <a class="forgot-link" href="{{ route('password.request') }}">
            <i class="fas fa-question-circle" style="margin-right: 4px; font-size: 0.75rem;"></i> Forgot?
          </a>
        @endif
      </div>

      <!-- Login Button -->
      <button type="submit" class="login-btn">
        <span>Log in</span>
        <i class="fas fa-arrow-right-to-bracket"></i>
      </button>

      <!-- footer note -->
      <div class="text-muted">
        <i class="fas fa-shield-alt" style="margin-right: 5px;"></i> 
        <span>secured · Betikrom Trade v2.0</span>
      </div>
    </form>
  </div>
</body>
</html>
```