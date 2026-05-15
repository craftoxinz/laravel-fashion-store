// resources/js/pages/shop.tsx

import React, { useState } from 'react';
import AppLayout from '../components/layout/AppLayout/AppLayout';
import Section from '../components/ui/section/Section';
import ProductCard from '../components/ui/productcard/ProductCard';
import styles from './shop.module.css';

// Define the shape of the product coming from Laravel Eloquent
interface Product {
    id: number;
    name: string;
    price: number; // Laravel sends decimals/integers as numbers or strings
    image: string;
    category?: string;
    description?: string;
}

interface ShopProps {
    products: Product[];
}

export default function Shop({ products }: ShopProps) {
    const [activeCategory, setActiveCategory] = useState('All');

    // Logic for filtering (Optional, but helps prevent errors if products is undefined)
    const displayProducts = products || [];

    return (
        <AppLayout activePage="shop">
            <Section id="shop-header">
                <div className={styles.header}>
                    <h1 className={styles.pageTitle}>Our Products</h1>
                    <div className={styles.sortContainer}>
                        <select className={styles.sortSelect}>
                            <option>Newest</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                        </select>
                    </div>
                </div>
            </Section>

            <Section id="shop-content" noPadding>
                <div className={styles.shopLayout}>
                    <aside className={styles.sidebar}>
                        <div className={styles.filterGroup}>
                            <h3 className={styles.filterLabel}>Categories</h3>
                            <ul className={styles.filterList}>
                                {[
                                    'All',
                                    'Jackets',
                                    'Shirts',
                                    'Pants',
                                    'Accessories',
                                ].map((cat) => (
                                    <li key={cat}>
                                        <button
                                            className={`${styles.filterBtn} ${activeCategory === cat ? styles.activeFilter : ''}`}
                                            onClick={() =>
                                                setActiveCategory(cat)
                                            }
                                        >
                                            {cat}
                                        </button>
                                    </li>
                                ))}
                            </ul>
                        </div>
                    </aside>

                    <div className={styles.mobileFilterBar}>
                        <button className={styles.mobileFilterToggle}>
                            Filter & Category
                        </button>
                    </div>

                    <div className={styles.grid}>
                        {displayProducts.length > 0 ? (
                            displayProducts.map((product) => (
                                <ProductCard
                                    key={product.id}
                                    product={product}
                                />
                            ))
                        ) : (
                            <p className={styles.emptyMessage}>
                                No products found in the database.
                            </p>
                        )}
                    </div>
                </div>
            </Section>
        </AppLayout>
    );
}
