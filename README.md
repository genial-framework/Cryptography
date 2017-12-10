[![Coveralls github branch](https://img.shields.io/coveralls/github/Genial-Framework/Cryptography/master.svg?style=flat-square)](https://coveralls.io/github/Genial-Framework/Cryptography?branch=master) [![Travis](https://img.shields.io/travis/Genial-Framework/Cryptography.svg?style=flat-square)](https://travis-ci.org/Genial-Framework/Cryptography) 

### Genial/Cryptography

-------
This dependent provides cryptographic tools to securely hash passwords, encrypt sensitive data using the common algorithms such as RSA, Blowfish, Twofish, and many more. This dependent only supports PHP 7 or higher so if you are using PHP 5.* please consider upgrading to the latest stable version of php which is PHP 7.2.0. This dependent is open to anybody that wants to contribute <https://github.com/Genial-Framework/Cryptography/blob/master/CONTRIBUTING.md>.

### Installation

-------
```
composer require genial-framework/cryptography
```

We suggest you use composer as it is quicker and easier. You can direct download the package, but if you do that then you need to create an autoloader to load all the files.

### Basic Usage

-------

Our cryptography component supports all the top encryption algorithms like TripleDES, RSA, Twofish, and much more. We implement the security practices possible to provide you with extensive security. Here is a simple encytion method using RSA with OpenSSL, while not using Mcrypt because it hs been deprecated.

    <?php

    use Genial\Cryptography\Adapter\OpenSSL;
    use Genial\Cryptography\Encryption\TripleDES;

    /* Initialize the RSA encryption algo using the openssl adapter */
    $RSA->addAdapter(new OpenSSL());

    /* Set The Key Pair */
    $RSA->setKeyPair(

        /* Digest Algo */
        'sha256',
    
        /* Private Key Bits */
        '1024',
    
        /* Private Key Type */
        OPENSSL_KEYTYPE_RSA
    
    );

    /* Encrypt Text */
    $encrypted = $RSA->encrypt('Hello world');

    echo $encrypted;

    /* Decrypt Text */
    $decrypted = $RSA->decrypt($encrypted);

    ?>

### To Do

-------
- Implement the new Argon2 hashing algorithm
- Implement custom algorithms by Genial (Vero1, and Lovell1)

### Links

-------
- File issues at https://github.com/Genial-Framework/Cryptography/issues
- Documentation is at https://github.com/Genial-Framework/Cryptography/tree/master/docs
- Changelog is at https://github.com/Genial-Framework/Cryptography/blob/master/change.log
