Grokki App Schema setup


1. Create a database called `grokki` if it doesn't already exist.
2. Run schema-v1.0.sql to generate tables and indexes for grokki schema
3. Run message_trigger.sql
4. Run message_router_proc.sql
5. Run load_categories.sql
6. Run zipcodes1.sql
7. Run zipcodes2.sql
8. Run seed_data.sql
9. Run business_search2012.sql

Notes:

*message_trigger and message_router sql will error on first statement if the objects don't exist. This is expected. Continue with config.
*business_search2012 is a large seed data file and may need to be run via command line: myslq < business_search2012.sql