# CouchDB ODM

Doctrine CouchDB is a mapper between PHP and CouchDB documents. It uses a metadata mapping
pattern to map the documents to plain old php objects, no ActiveRecord pattern or base class
of any kind is necessary.

Metadata mapping can be done through annotations, xml, yaml or php. A sample PHP object
that is mapped to CouchDB with annotations looks like this:

    /**
     * @Document
     */
    class Article
    {
        /** @Id */
        private $id;

        /**
         * @Field(type="string")
         */
        private $topic;

        /**
         * @Field(type="string")
         */
        private $text;

        /**
         * @ReferenceOne(targetDocument="User")
         */
        private $author;

        // a bunch of setters and getters
    }

A simple workflow with this document looks like:

    $article = new Article();
    $article->setTopic("Doctrine CouchDB");
    $article->setText("Documentation");
    $article->setAuthor(new Author("beberlei"));

    // creating the document
    $dm->persist($article);
    $dm->flush();

    $article = $dm->find("Article", 1234);
    $article->setText("Documentation, and more documentation!");

    // update the document
    $dm->flush();

    // removing the document
    $dm->remove($article);
    $dm->flush();

You can play around with the sandbox shipped in the sandbox/ folder of every git checkout
or read the documentation at http://www.doctrine-project.org/docs/couchdb_odm/1.0/en/

