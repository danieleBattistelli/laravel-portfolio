import React, { useState } from 'react';
import axios from 'axios';

const SearchReviews = () => {
    const [searchTerm, setSearchTerm] = useState('');
    const [reviews, setReviews] = useState([]);

    const handleSearch = async () => {
        try {
            const response = await axios.get(`http://127.0.0.1:8000/api/reviews`, {
                params: { search: searchTerm }
            });
            setReviews(response.data.data.data); // Accedi ai dati paginati
        } catch (error) {
            console.error('Errore durante la ricerca:', error);
        }
    };

    return (
        <div>
            <input
                type="text"
                placeholder="Cerca recensioni..."
                value={searchTerm}
                onChange={(e) => setSearchTerm(e.target.value)}
            />
            <button onClick={handleSearch}>Cerca</button>
            <ul>
                {reviews.map((review) => (
                    <li key={review.id}>{review.gametitle}</li>
                ))}
            </ul>
        </div>
    );
};

export default SearchReviews;
