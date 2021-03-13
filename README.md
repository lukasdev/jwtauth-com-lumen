## Autenticação jwt usando lumen 8 e jwt-auth

**Seguir instruições do package jwt-auth:**
[Instruções do Package](https://jwt-auth.readthedocs.io/en/develop/lumen-installation/)


**Em seguida, copiar:**
_vendor/laravel/config/auth.php_
**e colar em**
_config/auth.php_


**No arquivo config/auth.php definir o indice guards:**
```
'guards' => [
    'api' => [
        'driver' => 'jwt',
        'provider' => 'users',
        'hash' => false
    ]
],
```

***E no indice _providers_ definir:**
```
'users' => [
    'driver' => 'eloquent',
    'model'  =>  App\Models\User::class,
]
```


**Em seguida, na model de usuario importar _use Tymon\JWTAuth\Contracts\JWTSubject;_ e implementar JWTSubject.**


**Declarar os dois metodos:**
```
//Esse metodo é quem de fato vai gerar a key do usuario autenticado pelo attempt
public function getJWTIdentifier() {
    return $this->getKey();
}

//esse metodo serve para acrescentar informações adicionais pertinentes 
//ao usuario autenticado dentro da key gerada. 
public function getJWTCustomClaims() {
    return [];
}
```