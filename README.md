# bbd_honee.ee_addon
Hon:EE is an EXTREMELY simple plugin to give you a better spam option than captcha for your forms and UI experience.

## Usage
Using forms is a must in today's web world. Don't muddy up your UI with an ugly, unfriendly captcha.
Use Hon:EE. Using the honeypot technique of providing a hidden field on your form to remain blank,
you can validate against it for your form submissions.

Since some of the bots have gotten smart to the technique, Hon:EE allows you to provide a name parameter
which it uses for your class, id, and name fields for creating the label and form input field. It also
allows you to make it a required field to trick the bots and a required value for you to set.

There are 3 parameters, all of which are optional.

`{exp:honee}`

This will return:

```
<label for="honee" class="honee">Honee</label>
<input type="text" class="honee" name="honee" id="honee" tabindex="-1">
```

You can change the class with the class parameter like this:

`{exp:honee class="your_class"}`

This will return:

```
<label for="your_class" class="your_class">Your Class</label>
<input type="text" class="your_class" name="your_class" id="your_class" tabindex="-1">
```

You can make the field a required field and force a value:

`{exp:honee class="your_class" required="your_value"}`

This will return:

```
<label for="your_class" class="your_class">Your Class</label>
<input type="text" class="your_class" name="your_class" id="your_class" required value="your_value" tabindex="-1">
```
