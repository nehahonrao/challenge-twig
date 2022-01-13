# challenge-Twig
### Date:12-01-2022

- created links for homepage and aboutme in base.html.twig
- for displaying date  i installed composer require twig/intl-extra but i got error as "y" is not recognized,install intl.then i tried by installling sudo apt-get install php-intl.still there was error so i came to know that  i have to make changes in my php.ini file in xampp.
- i did these lines: ; c:/xampp/php/php.ini
                     ;  Uncomment the intl extension to enable the intl module
                     extension=intl 
- and current dates are displaying.
- to display quotes, i need to use twig function

 