<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="methods.js"></script>
</head>
<body>
    <div class="main-wrapper">
        <div class="row g-4">
            <div class="col-xl-6 mx-auto">
                <div class="account-nav bg-white rounded py-5">
                    <div class="container bg-white p-4 rounded">
                        <h2 class="text-center mb-4 text-secondary display-4">Recupera Password</h2>

                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="input-field">
                                    <label class="fw-bold text-dark fs-sm mb-1">Username o Email</label>
                                    <input placeholder="Inserisci il tuo username o email" type="text" class="theme-input form-control" name="usernameOrEmail" id="usernameOrEmail">
                                </div>

                                <div class="row g-4 mt-4">
                                    <div class="col-sm-12 text-center">
                                        <button type="button" class="btn btn-primary" onclick="sendResetLink()">Invia</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Aggiungi i tuoi tag di chiusura qui, se necessario -->
</body>
</html>
