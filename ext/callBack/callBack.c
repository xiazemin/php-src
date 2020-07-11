/*
  +----------------------------------------------------------------------+
  | PHP Version 7                                                        |
  +----------------------------------------------------------------------+
  | Copyright (c) 1997-2016 The PHP Group                                |
  +----------------------------------------------------------------------+
  | This source file is subject to version 3.01 of the PHP license,      |
  | that is bundled with this package in the file LICENSE, and is        |
  | available through the world-wide-web at the following url:           |
  | http://www.php.net/license/3_01.txt                                  |
  | If you did not receive a copy of the PHP license and are unable to   |
  | obtain it through the world-wide-web, please send a note to          |
  | license@php.net so we can mail you a copy immediately.               |
  +----------------------------------------------------------------------+
  | Author:                                                              |
  +----------------------------------------------------------------------+
*/

/* $Id$ */

#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include "php.h"
#include "php_ini.h"
#include "ext/standard/info.h"
#include "php_callBack.h"

/* If you declare any globals in php_callBack.h uncomment this:
ZEND_DECLARE_MODULE_GLOBALS(callBack)
*/

/* True global resources - no need for thread safety here */
static int le_callBack;

/* {{{ PHP_INI
 */
/* Remove comments and fill if you need to have entries in php.ini
PHP_INI_BEGIN()
    STD_PHP_INI_ENTRY("callBack.global_value",      "42", PHP_INI_ALL, OnUpdateLong, global_value, zend_callBack_globals, callBack_globals)
    STD_PHP_INI_ENTRY("callBack.global_string", "foobar", PHP_INI_ALL, OnUpdateString, global_string, zend_callBack_globals, callBack_globals)
PHP_INI_END()
*/
/* }}} */

/* Remove the following function when you have successfully modified config.m4
   so that your module can be compiled into PHP, it exists only for testing
   purposes. */

/* Every user-visible function in PHP should document itself in the source */
/* {{{ proto string confirm_callBack_compiled(string arg)
   Return a string to confirm that the module is compiled in */
PHP_FUNCTION(confirm_callBack_compiled)
{
	char *arg = NULL;
	size_t arg_len, len;
	zend_string *strg;

	if (zend_parse_parameters(ZEND_NUM_ARGS(), "s", &arg, &arg_len) == FAILURE) {
		return;
	}

	strg = strpprintf(0, "Congratulations! You have successfully modified ext/%.78s/config.m4. Module %.78s is now compiled into PHP.", "callBack", arg);

	RETURN_STR(strg);
}
/* }}} */
PHP_FUNCTION(hello_callback)
{
	zval *function_name;
	zval retval;
	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "z", &function_name) == FAILURE) {
		return;
	}
	if (Z_TYPE_P(function_name) != IS_STRING) {
		php_printf("Function require string argumnets!");
		return;
	}
	//TSRMLS_FETCH();
	if (call_user_function_ex(EG(function_table), NULL, function_name, &retval, 0, NULL, 0, NULL TSRMLS_CC) != SUCCESS) {
		php_printf("Function call failed!");
		return;
	}

	*return_value = retval;
	zval_copy_ctor(return_value);
	zval_ptr_dtor(&retval);

}
/* The previous line is meant for vim and emacs, so it can correctly fold and
   unfold functions in source code. See the corresponding marks just before
   function definition, where the functions purpose is also documented. Please
   follow this convention for the convenience of others editing your code.
*/


/* {{{ php_callBack_init_globals
 */
/* Uncomment this function if you have INI entries
static void php_callBack_init_globals(zend_callBack_globals *callBack_globals)
{
	callBack_globals->global_value = 0;
	callBack_globals->global_string = NULL;
}
*/
/* }}} */

/* {{{ PHP_MINIT_FUNCTION
 */
PHP_MINIT_FUNCTION(callBack)
{
	/* If you have INI entries, uncomment these lines
	REGISTER_INI_ENTRIES();
	*/
	return SUCCESS;
}
/* }}} */

/* {{{ PHP_MSHUTDOWN_FUNCTION
 */
PHP_MSHUTDOWN_FUNCTION(callBack)
{
	/* uncomment this line if you have INI entries
	UNREGISTER_INI_ENTRIES();
	*/
	return SUCCESS;
}
/* }}} */

/* Remove if there's nothing to do at request start */
/* {{{ PHP_RINIT_FUNCTION
 */
PHP_RINIT_FUNCTION(callBack)
{
#if defined(COMPILE_DL_CALLBACK) && defined(ZTS)
	ZEND_TSRMLS_CACHE_UPDATE();
#endif
	return SUCCESS;
}
/* }}} */

/* Remove if there's nothing to do at request end */
/* {{{ PHP_RSHUTDOWN_FUNCTION
 */
PHP_RSHUTDOWN_FUNCTION(callBack)
{
	return SUCCESS;
}
/* }}} */

/* {{{ PHP_MINFO_FUNCTION
 */
PHP_MINFO_FUNCTION(callBack)
{
	php_info_print_table_start();
	php_info_print_table_header(2, "callBack support", "enabled");
	php_info_print_table_end();

	/* Remove comments if you have entries in php.ini
	DISPLAY_INI_ENTRIES();
	*/
}
/* }}} */

/* {{{ callBack_functions[]
 *
 * Every user visible function must have an entry in callBack_functions[].
 */
const zend_function_entry callBack_functions[] = {
	PHP_FE(confirm_callBack_compiled,	NULL)		/* For testing, remove later. */
	PHP_FE(hello_callback,NULL)
	PHP_FE_END	/* Must be the last line in callBack_functions[] */
};
/* }}} */

/* {{{ callBack_module_entry
 */
zend_module_entry callBack_module_entry = {
	STANDARD_MODULE_HEADER,
	"callBack",
	callBack_functions,
	PHP_MINIT(callBack),
	PHP_MSHUTDOWN(callBack),
	PHP_RINIT(callBack),		/* Replace with NULL if there's nothing to do at request start */
	PHP_RSHUTDOWN(callBack),	/* Replace with NULL if there's nothing to do at request end */
	PHP_MINFO(callBack),
	PHP_CALLBACK_VERSION,
	STANDARD_MODULE_PROPERTIES
};
/* }}} */

#ifdef COMPILE_DL_CALLBACK
#ifdef ZTS
ZEND_TSRMLS_CACHE_DEFINE()
#endif
ZEND_GET_MODULE(callBack)
#endif

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: noet sw=4 ts=4 fdm=marker
 * vim<600: noet sw=4 ts=4
 */
