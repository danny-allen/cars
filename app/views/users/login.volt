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