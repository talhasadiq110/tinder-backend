#!/bin/bash

echo "=== Tinder Backend API Test Sequence ==="

# Reset database
echo "1. Resetting database..."
php artisan migrate:fresh --seed

# Test sequence
echo "2. Testing API status..."
curl -s http://localhost:8000/api/test | jq .

echo "3. Getting initial recommendations..."
curl -s http://localhost:8000/api/recommendations | jq '.count'

echo "4. Liking person 1..."
curl -s http://localhost:8000/api/like/1 | jq '.message'

echo "5. Liking person 2..."
curl -s http://localhost:8000/api/like/2 | jq '.message'

echo "6. Disliking person 3..."
curl -s http://localhost:8000/api/dislike/3 | jq '.message'

echo "7. Getting updated recommendations..."
curl -s http://localhost:8000/api/recommendations | jq '.count'

echo "8. Getting liked list..."
curl -s http://localhost:8000/api/liked | jq '.count'

echo "9. Debug swipes..."
curl -s http://localhost:8000/api/debug/swipes | jq '.count'

echo "10. Testing cron job..."
php artisan check:popular

echo "=== Test Complete ==="