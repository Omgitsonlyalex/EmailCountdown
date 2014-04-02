EmailCountdown
==============


**What does this do?**

Creates a countdown image counting down to a specific time/date for use in email campaigns.

**How does it work?**

This generates an image based on the following variables:

```php
  $image = imagecreatefrompng('images/countdown.png');
  $font = array(
    'size'=>23, // Font size, in pts usually.
    'angle'=>0, // Angle of the text
    'x-offset'=>7, // The larger the number the further the distance from the left hand side, 0 to align to the left.
    'y-offset'=>30, // The vertical alignment, trial and error between 20 and 60.
    'file'=>'./GillSans.ttc', // Font path
    'color'=>imagecolorallocate($image, 55, 160, 130), // RGB Colour of the text
  );
```

