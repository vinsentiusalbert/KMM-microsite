<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin KMM</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 20px;
            color: #171126;
            font-family: "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(circle at 82% 8%, rgba(52, 32, 127, .18), transparent 28%),
                linear-gradient(180deg, #ffffff 0%, #f5f1fc 100%);
        }
        .login-card {
            width: min(390px, 100%);
            padding: 26px 22px;
            border-radius: 8px;
            background: #fff;
            border: 1px solid #e6ddf0;
            box-shadow: 0 18px 44px rgba(24, 15, 77, .14);
        }
        h1 {
            margin: 0 0 6px;
            color: #34207f;
            font-size: 24px;
            line-height: 1.15;
        }
        p {
            margin: 0 0 22px;
            color: #6d647a;
            font-size: 14px;
        }
        .field {
            display: grid;
            gap: 8px;
            margin-bottom: 16px;
        }
        label {
            font-size: 14px;
            font-weight: 700;
        }
        input {
            width: 100%;
            min-height: 48px;
            padding: 12px 14px;
            border: 1px solid #d8cee8;
            border-radius: 6px;
            background: #fcfaff;
            font: inherit;
            outline: none;
        }
        input:focus {
            border-color: #34207f;
            box-shadow: 0 0 0 4px rgba(52, 32, 127, .12);
        }
        .error {
            color: #b52014;
            font-size: 13px;
        }
        button {
            width: 100%;
            min-height: 48px;
            border: 0;
            border-radius: 6px;
            color: #fff;
            background: #34207f;
            font: inherit;
            font-weight: 700;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <main class="login-card">
        <h1>KMM Admin</h1>
        <p>Masuk untuk melihat data pendaftaran.</p>

        <form method="POST" action="<?php echo e(route('kmm-admin.login.submit')); ?>" novalidate>
            <?php echo csrf_field(); ?>

            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" placeholder="admin@admin.com" autocomplete="email" required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Masukkan password" autocomplete="current-password" required>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <button type="submit">Login</button>
        </form>
    </main>
</body>
</html>
<?php /**PATH D:\1 Kerja\KMM microsite\resources\views/kmm-admin/login.blade.php ENDPATH**/ ?>