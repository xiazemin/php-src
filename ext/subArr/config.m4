dnl $Id$
dnl config.m4 for extension subArr

dnl Comments in this file start with the string 'dnl'.
dnl Remove where necessary. This file will not work
dnl without editing.

dnl If your extension references something external, use with:

 PHP_ARG_WITH(subArr, for subArr support,
 Make sure that the comment is aligned:
  [  --with-subArr             Include subArr support])

dnl Otherwise use enable:

dnl PHP_ARG_ENABLE(subArr, whether to enable subArr support,
dnl Make sure that the comment is aligned:
dnl [  --enable-subArr           Enable subArr support])

if test "$PHP_SUBARR" != "no"; then
  dnl Write more examples of tests here...

  dnl # --with-subArr -> check with-path
  dnl SEARCH_PATH="/usr/local /usr"     # you might want to change this
  dnl SEARCH_FOR="/include/subArr.h"  # you most likely want to change this
  dnl if test -r $PHP_SUBARR/$SEARCH_FOR; then # path given as parameter
  dnl   SUBARR_DIR=$PHP_SUBARR
  dnl else # search default path list
  dnl   AC_MSG_CHECKING([for subArr files in default path])
  dnl   for i in $SEARCH_PATH ; do
  dnl     if test -r $i/$SEARCH_FOR; then
  dnl       SUBARR_DIR=$i
  dnl       AC_MSG_RESULT(found in $i)
  dnl     fi
  dnl   done
  dnl fi
  dnl
  dnl if test -z "$SUBARR_DIR"; then
  dnl   AC_MSG_RESULT([not found])
  dnl   AC_MSG_ERROR([Please reinstall the subArr distribution])
  dnl fi

  dnl # --with-subArr -> add include path
  dnl PHP_ADD_INCLUDE($SUBARR_DIR/include)

  dnl # --with-subArr -> check for lib and symbol presence
  dnl LIBNAME=subArr # you may want to change this
  dnl LIBSYMBOL=subArr # you most likely want to change this 

  dnl PHP_CHECK_LIBRARY($LIBNAME,$LIBSYMBOL,
  dnl [
  dnl   PHP_ADD_LIBRARY_WITH_PATH($LIBNAME, $SUBARR_DIR/$PHP_LIBDIR, SUBARR_SHARED_LIBADD)
  dnl   AC_DEFINE(HAVE_SUBARRLIB,1,[ ])
  dnl ],[
  dnl   AC_MSG_ERROR([wrong subArr lib version or lib not found])
  dnl ],[
  dnl   -L$SUBARR_DIR/$PHP_LIBDIR -lm
  dnl ])
  dnl
  dnl PHP_SUBST(SUBARR_SHARED_LIBADD)

  PHP_NEW_EXTENSION(subArr, subArr.c, $ext_shared,, -DZEND_ENABLE_STATIC_TSRMLS_CACHE=1)
fi
