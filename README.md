# mofh-enable-cloudflare
Enable CloudFlare for myownfreehost subdomain

# Description.

Demo site:
https://cftest.idmx.eu.org/

This is a sample code to add and activate an A record in CloudFlare.

Security risks are your own responsibility.

You will need knowledge of PHP to modify and integrate this into your client area.

not sure if this will work on the free hosting server provided by MOFH, but it probably will.

I am not good at English and may not be able to answer issues, etc.

My English is not good, so if you need any help, please ask for help in the MOFH community or on the IfastNet Discord.

# How to Use 

1. Code the add.html code anywhere in your client area.

2. Upload add_subdomain.php in the directory where the file with the code in 1.

3. Register with CloudFlare and add the domain you wish to activate CloudFlare for to CloudFlare.

4. Get the global API key from the CloudFlare dashboard, replacing $api_key in add_subdomain.php.

5. Replace $email in add_subdomain.php with the email address you registered with CloudFlare.

6. Replace $DOMAIN_ZONE_ID in $endpoint of add_subdomain.php. To get the ZONE_ID, go to the CloudFlare dashboard, click on your domain, and it will be listed under [Overview].


# Attention.

1. You need to change your name servers to add your domain to CloudFlare.

2. The website will not be accessible until the user processes the domain to be added to CloudFlare using this script.
The problem can be solved by having this script run automatically when this user registers a subdomain, but it depends on your client area environment and you will have to make the improvements yourself.
