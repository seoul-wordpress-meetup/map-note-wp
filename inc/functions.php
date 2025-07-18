<?php


// 플러그인에서 도움이 되는 래퍼 함수 생성
use Bojaghi\Continy\Continy;
use Bojaghi\Continy\ContinyFactory;
use Bojaghi\Helper\Facades;

if (!function_exists('mapNoteWp')) {
    /**
     * Wrapper function
     *
     * @return Continy
     */
    function mapNoteWp(): Continy
    {
        return Facades::container(dirname(__DIR__) . '/conf/continy.php', ContinyFactory::class);
    }
}

if (!function_exists('mapNoteWpGet')) {
    /**
     * @template T
     * @param class-string<T> $id
     * @param callable|false  $constructorCall Parameter of the callback:
     *                                         - 0th: continy instance
     *                                         - 1st: FQCN string of $id
     *                                         - 2nd: raw $id string
     *                                         Return of the callback: $id's real instance
     *
     * @return T|object|null
     * @see    Continy::instantiate()
     * @sample $this->get('myThing', function ($continy, $className, $id) { return new $className(); });
     */
    function mapNoteWpGet(string $id, callable|false $constructorCall = false): mixed
    {
        return Facades::get($id, $constructorCall);
    }
}


if (!function_exists('mapNoteWpCall')) {
    /**
     * @template T
     * @param class-string<T> $id
     * @param string          $method
     * @param array|false     $args
     *
     * @return mixed
     */
    function mapNoteWpCall(string $id, string $method, array|false $args = false): mixed
    {
        return Facades::call($id, $method, $args);
    }
}


if (!function_exists('mapNoteWpParseCallBack')) {
    function mapNoteWpParseCallBack(string|array|callable $callback): callable|null
    {
        return Facades::parseCallBack($callback);
    }
}
