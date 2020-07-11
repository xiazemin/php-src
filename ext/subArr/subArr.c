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
#include "php_subArr.h"

/* If you declare any globals in php_subArr.h uncomment this:
ZEND_DECLARE_MODULE_GLOBALS(subArr)
*/

/* True global resources - no need for thread safety here */
static int le_subArr;

/* {{{ PHP_INI
 */
/* Remove comments and fill if you need to have entries in php.ini
PHP_INI_BEGIN()
    STD_PHP_INI_ENTRY("subArr.global_value",      "42", PHP_INI_ALL, OnUpdateLong, global_value, zend_subArr_globals, subArr_globals)
    STD_PHP_INI_ENTRY("subArr.global_string", "foobar", PHP_INI_ALL, OnUpdateString, global_string, zend_subArr_globals, subArr_globals)
PHP_INI_END()
*/
/* }}} */

/* Remove the following function when you have successfully modified config.m4
   so that your module can be compiled into PHP, it exists only for testing
   purposes. */

/* Every user-visible function in PHP should document itself in the source */
/* {{{ proto string confirm_subArr_compiled(string arg)
   Return a string to confirm that the module is compiled in */
PHP_FUNCTION(confirm_subArr_compiled)
{
	char *arg = NULL;
	size_t arg_len, len;
	zend_string *strg;

	if (zend_parse_parameters(ZEND_NUM_ARGS(), "s", &arg, &arg_len) == FAILURE) {
		return;
	}

	strg = strpprintf(0, "Congratulations! You have successfully modified ext/%.78s/config.m4. Module %.78s is now compiled into PHP.", "subArr", arg);

	RETURN_STR(strg);
}
/* }}} */
ZEND_FUNCTION(academy_sample_array)
{
	zval subarray;

	array_init(return_value);

	// 添加标量
	add_assoc_long(return_value, "laravel", 55);
	add_index_bool(return_value, 100, 1);
	add_next_index_double(return_value, 3.1415926);

	// 静态字符串
	add_next_index_string(return_value, "Laravel");

	zend_string * str= estrdup("Academy");
	// 动态字符串
	add_next_index_string(return_value,str);
	zend_string_release(str);

	// 创建一个子数组
	//SW_MAKE_STD_ZVAL(subarray);
	array_init(&subarray);

	// 使用数值填充数组
	add_next_index_long(&subarray, 1);
	add_next_index_long(&subarray, 10);
	add_next_index_long(&subarray, 100);

	// 将子数组附加到父级数组
	add_index_zval(return_value, 200, &subarray);
}
/* The previous line is meant for vim and emacs, so it can correctly fold and
   unfold functions in source code. See the corresponding marks just before
   function definition, where the functions purpose is also documented. Please
   follow this convention for the convenience of others editing your code.
*/


/* {{{ php_subArr_init_globals
 */
/* Uncomment this function if you have INI entries
static void php_subArr_init_globals(zend_subArr_globals *subArr_globals)
{
	subArr_globals->global_value = 0;
	subArr_globals->global_string = NULL;
}
*/
/* }}} */

/* {{{ PHP_MINIT_FUNCTION
 */
PHP_MINIT_FUNCTION(subArr)
{
	/* If you have INI entries, uncomment these lines
	REGISTER_INI_ENTRIES();
	*/
	return SUCCESS;
}
/* }}} */

/* {{{ PHP_MSHUTDOWN_FUNCTION
 */
PHP_MSHUTDOWN_FUNCTION(subArr)
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
PHP_RINIT_FUNCTION(subArr)
{
#if defined(COMPILE_DL_SUBARR) && defined(ZTS)
	ZEND_TSRMLS_CACHE_UPDATE();
#endif
	return SUCCESS;
}
/* }}} */

/* Remove if there's nothing to do at request end */
/* {{{ PHP_RSHUTDOWN_FUNCTION
 */
PHP_RSHUTDOWN_FUNCTION(subArr)
{
	return SUCCESS;
}
/* }}} */

/* {{{ PHP_MINFO_FUNCTION
 */
PHP_MINFO_FUNCTION(subArr)
{
	php_info_print_table_start();
	php_info_print_table_header(2, "subArr support", "enabled");
	php_info_print_table_end();

	/* Remove comments if you have entries in php.ini
	DISPLAY_INI_ENTRIES();
	*/
}
/* }}} */

/* {{{ subArr_functions[]
 *
 * Every user visible function must have an entry in subArr_functions[].
 */
const zend_function_entry subArr_functions[] = {
	PHP_FE(confirm_subArr_compiled,	NULL)		/* For testing, remove later. */
	PHP_FE(academy_sample_array,NULL)
	PHP_FE_END	/* Must be the last line in subArr_functions[] */
};
/* }}} */

/* {{{ subArr_module_entry
 */
zend_module_entry subArr_module_entry = {
	STANDARD_MODULE_HEADER,
	"subArr",
	subArr_functions,
	PHP_MINIT(subArr),
	PHP_MSHUTDOWN(subArr),
	PHP_RINIT(subArr),		/* Replace with NULL if there's nothing to do at request start */
	PHP_RSHUTDOWN(subArr),	/* Replace with NULL if there's nothing to do at request end */
	PHP_MINFO(subArr),
	PHP_SUBARR_VERSION,
	STANDARD_MODULE_PROPERTIES
};
/* }}} */

#ifdef COMPILE_DL_SUBARR
#ifdef ZTS
ZEND_TSRMLS_CACHE_DEFINE()
#endif
ZEND_GET_MODULE(subArr)
#endif

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: noet sw=4 ts=4 fdm=marker
 * vim<600: noet sw=4 ts=4
 */
