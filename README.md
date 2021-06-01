THE DOWNLOAD FEATURE

First of all the intervention image was installed which can be found at the following link

http://image.intervention.io/getting_started/introduction

The intervention image use the Make method which finds the image on the public folder, (Background image)
The text method is available to add text to the image.
 it has four parameters 
 -text(name or city) 
 -width(from the left) 
 -height(from the top) 
 and it takes a closure where the font parameters of the text are attached to -font-file, is the most needed one if

it is not used the text doesnt show
The last field is to return the image, the response takes the file type you are returning
The background image and fonts are all in the public folder.
The web URL was created which is Certificate

// the download url, its a post, get is also working Route::post('certificate', 'CertificateController@certificate')->name('certificate');

Certicate Controller was uses, it has post method that can receive data from the Vue Component.

THE VUE JS

The created a view in the resource folder called views where there is a component called certificate. The component is rendered on the view inside the certificates folder and on the download file.

Axios was used to send the data to the database as directed on the other code. There is a simulation of a form to send the data to the controller and the controller to receive the data default I just used a form that is filling the name and the name is handled on the backend

Certificate Component