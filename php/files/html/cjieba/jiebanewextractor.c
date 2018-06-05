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
	//printf("ExtractDemo:\n");
	static const char* DICT_PATH = "./dict/jieba.dict.utf8";
	static const char* HMM_PATH = "./dict/hmm_model.utf8";
	static const char* IDF_PATH = "./dict/idf.utf8";
	static const char* STOP_WORDS_PATH = "./dict/stop_words.utf8";
	static const char* USER_DICT = "./dict/user.dict.utf8";

	// init will take a few seconds to load dicts.
	Extractor handle = NewExtractor(DICT_PATH, HMM_PATH, IDF_PATH,
			STOP_WORDS_PATH, USER_DICT);

	const char* s = arg2string(argc, argv);
	size_t top_n = 5;
	CJiebaWord* words = Extract(handle, s, strlen(s), top_n);
	CJiebaWord* x;
	for (x = words; x && x->word; x++) {
		printf("%*.*s\n", x->len, x->len, x->word);
	}
	FreeWords(words);
	FreeExtractor(handle);

	return 0;
}
