#include <stdio.h>
#include <stdlib.h>

#include "lib/jieba.h"
#include <string.h>

char* arg2string(int argc, char** argv) {
	int i;
	int strsize = 0;
	for (i = 1; i < argc; i++) {
		strsize += strlen(argv[i]);
		if (argc > i + 1)
			strsize++;
	}

	//printf("strsize: %d\n", strsize);

	char *cmdstring;
	cmdstring = malloc(strsize);
	cmdstring[0] = '\0';

	for (i = 1; i < argc; i++) {
		strcat(cmdstring, argv[i]);
		if (argc > i + 1)
			strcat(cmdstring, " ");
	}

	//printf("cmdstring: %s\n", cmdstring);

	return &cmdstring[0];
}

int main(int argc, char** argv) {
	//printf("CutWithoutTagNameDemo:\n");
	static const char* DICT_PATH = "./dict/jieba.dict.utf8";
	static const char* HMM_PATH = "./dict/hmm_model.utf8";
	static const char* USER_DICT = "./dict/user.dict.utf8";
	// init will take a few seconds to load dicts.
	Jieba handle = NewJieba(DICT_PATH, HMM_PATH, USER_DICT);

	const char* s = arg2string(argc, argv);
	size_t len = strlen(s);
	CJiebaWord* words = CutWithoutTagName(handle, s, len, "x");
	CJiebaWord* x;
	for (x = words; x->word; x++) {
		printf("%*.*s\n", x->len, x->len, x->word);
	}
	FreeWords(words);
	FreeJieba(handle);

	return 0;
}
