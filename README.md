# ERGASIA_PMS18

Make sure you have `Ansible` installed on your control node, which can be your local machine. You'll need two Ubuntu 20.04 remote servers to serve as FREEDOM and OWNCLOUD with an SSH connection with your local machine.

1. Clone this repository.
2. Set up your `hosts` file with the IP addresses of the two remote servers.
3. Adjust values on your `group_vars/all.yml` file.
4. Run the `server-setup.yml` playbook to set up the LEMP environement to your remote servers.
5. Run the `app-deploy.yml` playbook to deploy the FREEDOM and OWNCLOUD applications.
6. Access your server's IP address or hostname to test the setup.

# SMTP SETTINGS
For the smtp settings you need an account to `https://mailtrap.io/` . Then:

1. Edit the `laravel-env.j2` file (set the MAIL_USERNAME and MAIL_PASSWORD of your account).
2. Go to `application/freedom/app/Http/Controllers/PhotoController.php` and set to `$billData` variable the url of the FREEDOM app server.
