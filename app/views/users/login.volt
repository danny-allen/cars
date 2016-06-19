<div class="container container--white container--border-side">
    <div class="page-header">
        <h1>Login</h1>
        <p><?php echo $this->flashSession->output(); ?></p>
    </div>
</div>

<div class="container container--wide">
    <div class="container">
        {{ form('users/auth') }}
            <fieldset>
                <div>
                    <label for="login">Username</label>
                    <div>
                        {{ text_field('login') }}
                    </div>
                </div>
                <div>
                    <label for="password">Password</label>
                    <div>
                        {{ password_field('password') }}
                    </div>
                </div>
                <div>
                    {{ submit_button('Login') }}
                </div>
            </fieldset>
        </form>
    </div>
</div>