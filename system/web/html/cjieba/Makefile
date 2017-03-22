all: demo jiebacut jiebacutwithouttagname jiebanewextractor
jiebacut: libjieba.a
	gcc -o jiebacut jiebacut.c -L./ -ljieba -lstdc++ -lm
jiebacutwithouttagname: libjieba.a
	gcc -o jiebacutwithouttagname jiebacutwithouttagname.c -L./ -ljieba -lstdc++ -lm
jiebanewextractor: libjieba.a
	gcc -o jiebanewextractor jiebanewextractor.c -L./ -ljieba -lstdc++ -lm
demo: libjieba.a
	gcc -o demo demo.c -L./ -ljieba -lstdc++ -lm
libjieba.a:
	g++ -o jieba.o -c -DLOGGING_LEVEL=LL_WARNING -I./deps/ lib/jieba.cpp
	ar rs libjieba.a jieba.o 
clean:
	rm -f *.a *.o demo
