# YSE Sageboy

Hooks Routes and Blocks to help with CAS/Admin/Anon user management.

## yse_sageboy.sageboy_login

A route that shows the non-CAS user login at the route '/sageboy/accessform' in order to allow access to an admin user with regular credentials instead of CAS.

Nothing increases security here, this is merely to stop bots from finding user login easily.

It is assumed that for sites with forced login set, only this route will allow for non-CAS login.

TODO: make setting that shuts down the form completely
TODO: make drush command for that
TODO: make controller that would just send one-time-pass to a sageboy user email.
TODO: get comfortable with terminus/drush one-time-pass for user 1


## Drupal\yse_sageboy\Routing\RouteSubscriber

Intercepts the user.login route and swaps in the CAS controller.

This measure allows for anon users to see error messages and take action, different from 'forced login' that not only forces CAS as the mechanism looks like it won't allow for a anon user moment.

Can be used alongside 'forced login' where certain URLs may be forced.

## yse_sageboy_form_user_login_form_alter

We add a wrapper to the user-login-form where in future we can put a settings driven message.

## notes

Route for sageboy_login sets admin route to FALSE, allowing non-admin theme to take over markup.

Experimenting with CAS module settings for Gateway feature and Forced.
