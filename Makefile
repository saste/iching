project_name=iching

revision_id=$(shell date "+%Y-%m-%d")
revision_name=$(shell echo $(project_name)-$(revision_id) | tr -d " ")

all: dist

# dist means "distribution"
DIST_DIR=..

dist_files=$(shell git ls-files)

# if any files is changed the MANIFEST is to be updated and the dist itself too
MANIFEST: $(dist_files)
	ls $(dist_files) | sed -ne 's:^:$(revision_name)/:p' > MANIFEST

# create in the DIST_DIR directory a tarball for the project
#in order to avoid last-minute problems, execute the main target to
#be sure that there are at least no compilation problems
tarball_dist: MANIFEST
	revision_dir=$$(basename $$PWD) ; cd ..; if [ ! -d $(revision_name) ]; then ln -s $$revision_dir $(revision_name); fi
	cd ..; tar -czvf $(revision_name).tar.gz $$(cat $(revision_name)/MANIFEST)
	cd ..; if [ -L $(revision_name) ]; then rm $(revision_name); fi #remove $(revision_name) only if it's _just_ a link
	[ .. = $(DIST_DIR) ] || mv ../$(revision_name).tar.gz $(DIST_DIR)

zip_dist: MANIFEST
	revision_dir=$$(basename $$PWD) ; cd ..; if [ ! -d $(revision_name) ]; then ln -s $$revision_dir $(revision_name); fi
	cd ..; zip $(revision_name).zip $$(cat $(revision_name)/MANIFEST)
	cd ..; if [ -L $(revision_name) ]; then rm $(revision_name); fi #remove $(revision_name) only if it's _just_ a link
	[ .. = $(DIST_DIR) ] || mv ../$(revision_name).zip $(DIST_DIR)

dist: tarball_dist

