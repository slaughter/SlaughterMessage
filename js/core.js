// This is all the js we need. Nothing fancy.

// This is for encrypting the message
$("#btn").click(function() {
    // Set the secret for the encryption.
    var secret = $("#passwd").val(); // Set it to be the value of the password box.

    // Set the message to encrypt
    var msg = $("#message").val(); // Same as above but use textarea.

    // Encrypt the message. See https://code.google.com/p/crypto-js/
    var encrypted = CryptoJS.AES.encrypt(msg, secret); 

    // Set the value of the text area to be the encrypted message
    $('#message').val(encrypted);

    // Submit the form.
    $("#info").submit();
});

// And this is for decrypting the message
$("#decryptBtn").click(function() {

    // Set the secret to be the password entered in the password box.
    var secret = $("#passwd").val();

    // Set the encrypted message to be the value of the text area.
    var encMsg = $("#msgBox").val();

    // Use cryptoJS to decrypt the message using the secret given.
    var decrypted = CryptoJS.AES.decrypt(encMsg, secret);

    // Set the textareas text to be the decrypted string.
    $("#msgBox").val(decrypted.toString(CryptoJS.enc.Utf8));
});

// Aaaaaaand we are done.
