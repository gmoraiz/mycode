NO TYPE-HINT, SE UMA CLASSE A (abstrata, interface) FOR MARCADA COMO TYPE HINT, EXEMPLO,
interface Foo{
   public function metodo(A $a);
}
OU
class Foo{
   public function metodo(A $a){

   }
}

E B, C e D SAO SUBCLASSES DE A, ENTAO EH POSSIVEL FAZER O SEGUINTE:

$foo = new Foo();
$foo->metodo(new B);
$foo->metodo(new C);
$foo->metodo(new D);

NAO EH PERMITIDO $foo->metodo(new A); POIS, A EH ABSTRATA